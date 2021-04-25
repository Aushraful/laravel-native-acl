

================================ Installation ================================

To install it, 
1) copy/move this project to your preffered directory, 
2) create a database called "usermanagement",
3) run this command on your terminal "php artisan migrate --seed"

================================ How it's built ================================

It's built using the Laravel native auth, gates, and orm. It has a complete user interface for managing user, role, permission, etc. dynamically and easily.

1) To start of, the relations are defined in the User, Role, Permission model. User model contains all the authorization stuffs.
2) In "Provider/AuthServiceProvider" Laravels "Gate::define" method is used dynamically. "Gate::define" is used for checking if the role has the required permissions, if not, the specific user has the required perissions or not.
      To prevent error when migrating, I've used,

           if (Schema::hasTable('permissions')) {
                // functions here will only execute when the "permissions" table exists
           }

3) On Database, all the create::table are on the users_table migration.
4) Seeders are also created for UsersTable, RoleTable, PermissionTable
5) On UsersTableSeeder, user roles are assigned to users | On PermissionTableSeeder, Permissions are assigned to roles

================================ How to use it ================================

It's usage is very simple then other packages. To use it,

View protection / To manage what users can or can't see
on blade file, 

      @can('permission-slug')
          Things that are ristricted and needs permission to access
      @endcan
          Things that are not ristricted and does not require any permission to access

Route pretection / To prevent users direct access using URL
on controller,

      public function somefunction(){
           if (Auth::user()->cannot('view-user')){
               return abort(403);
           }
           $users = User::all();
           return view('back-end/user/user_list', compact('users'));
      }

Here the "if" condition is for checking if the authenticated user has permission or not. If has permission, redirects to requested page. else, what message you want to thorugh or redirect them where you want.

================================ Hope you enjoy it ================================


