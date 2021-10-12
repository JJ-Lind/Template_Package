<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsersDatatable extends Component {

    use WithPagination;

    public string $search = '';
    public string $sort_field = 'name';
    public string $sort_asc = 'asc';
    public int $perPage = 10;
    public array $selected = [];
    public object $roles;
    public ?object $selected_user = null;
    public array $selected_users = [];
    public string $selected_role = '';
    public string $email = '';
    public string $name = '';
    public bool $show_role_modal = false;
    public bool $show_delete_modal = false;
    public bool $show_create_modal = false;
    protected array $rules = [
        'name' => [
            'required',
            'string',
            'max:255'
        ],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users'
        ],
    ];

    public function mount()
    {
        $this->selected_user = null;
        $this->roles = Role::all()->pluck('name', 'name')->reject(function ($role) {
            return $role == 'super-admin';
        })->map(function ($role) {
            return ucwords($role);
        });
    }

    public function updated($name, $value)
    {
        if ((in_array($name, [
                'show_create_modal',
                'show_delete_modal',
                'show_role_modal'
            ])) && !$value) {
            $this->selected = [];
            $this->selected_user = null;
            $this->selected_users = [];
            $this->selected_role = '';
            $this->email = '';
            $this->name = '';
        }
        elseif (in_array($name, [
            'email',
            'name',
            'selected_role'
        ])) {
            $this->validateOnly($name);
        }
    }

    public function confirmAction($action, $user = null)
    {
        if ((in_array($action, [
                'role',
                'delete'
            ])) && ( !empty($this->selected) || !empty($user))) {
            if (( !empty($user)) && $user != auth()->id()) {
                $this->selected_user = (new User)->firstWhere('id', $user);
            }
            elseif (($action != 'create') && !empty($this->selected)) {
                $this->selected_users = (new User)->whereIn('id', $this->selected)->get()->reject(function ($selected_user) {
                    return $selected_user->id == auth()->id() || $selected_user->hasRole('super-admin');
                })->transform(function ($selected_user) {
                    return [
                        'id' => $selected_user->id,
                        'name' => $selected_user->name
                    ];
                })->toArray();
            }
        }

        switch ($action) {
            case 'create':
                if (auth()->user()->hasPermissionTo('create users')) {
                    $this->show_create_modal = true;
                    break;
                }
                session()->flash('warning', __('You do not have permission to create users.'));
                break;
            case 'delete':
                if ((auth()->user()->hasPermissionTo('delete users')) && ( !empty($this->selected_user || $this->selected_users))) {
                    $this->show_delete_modal = true;
                    break;
                }
                session()->flash('warning', __('You do not have permission to delete users.'));
                break;
            case 'role':
                if ((auth()->user()->hasPermissionTo('assign roles')) && ( !empty($this->selected_user || $this->selected_users))) {
                    $this->show_role_modal = true;
                    break;
                }
                session()->flash('warning', __('You do not have permission to assign roles.'));
                break;
            default:
                session()->flash('warning', __('Something went wrong. Refreshing...'));
                sleep(1);
                header("Refresh:0");
        }
    }

    public function assignRole()
    {
        $validated_role = $this->validate([
            'selected_role' => 'required|exists:roles,name'
        ]);

        $users = (new User)->whereIn('id', collect($this->selected_users)->pluck('id'))->get();
        $users->each(function ($user) use ($validated_role) {
            $user->syncRoles($validated_role['selected_role']);
        });

        $message = $users->count() > 1
            ? __('Users role successfully updated.')
            : __('User role successfully updated.');

        flash($message, 'success')->livewire($this);
        $this->show_role_modal = false;
    }

    public function createUser()
    {
        $validated_data = $this->validate();

        $password = bin2hex(openssl_random_pseudo_bytes(4));
        logger($password);

        User::factory([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => $password
        ])->create()->assignRole($validated_data['selected_role']);

        flash(__('User successfully created.'), 'success')->livewire($this);

        $this->show_create_modal = false;
    }

    public function deleteUsers()
    {
        if ( !empty($this->selected_user)) {
            $this->selected_user->delete();
            flash(__('User successfully deleted.'), 'success')->livewire($this);
        }
        else {
            User::destroy(collect($this->selected_users)->pluck('id')->toArray());
            flash(__('Users successfully deleted.'), 'success')->livewire($this);
        }
        $this->show_delete_modal = false;
    }

    public function render(): View
    {
        return view('livewire.users-datatable', [
            'users' => User::search($this->search)->with('roles')->orderBy($this->sort_field, $this->sort_asc)->paginate($this->perPage)->through(function ($user) {
                return [
                    'id' => $user->id,
                    'avatar' => $user->profilePicture(),
                    'name' => $user->name,
                    'email' => $user->email,
                    'roles' => $user->getRoleNames()->whenNotEmpty(function ($roles) {
                        return $roles->map(function ($role) {
                            return ucwords(str_replace('-', ' ', $role));
                        })->join(', ');
                    }, function () {
                        return __('Unassigned');
                    }),
                    'last_login' => $user->last_login
                        ? $user->last_login->diffForHumans()
                        : __('N/A')
                ];
            })
        ]);
    }
}
