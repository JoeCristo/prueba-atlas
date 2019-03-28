import { RouterModule, Routes } from '@angular/router';
import { UsersComponent } from './components/users/users.component';
import { UserComponent } from './components/users/user.component';


const APP_ROUTES: Routes = [
    { path: 'users', component: UsersComponent },
    { path: 'user/:id', component: UserComponent },
    { path: '**', pathMatch: 'full', redirectTo: 'users' }
];

export const APP_ROUTING = RouterModule.forRoot(APP_ROUTES);