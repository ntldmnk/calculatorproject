import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { AboutComponent } from './about/about.component';
import { LoginComponent } from './login/login.component';
import { CalculatorComponent } from './calculator/calculator.component';
import { authGuard } from './auth.guard';


export const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'login', component: LoginComponent},
    {path: 'home', component: HomeComponent},
    {path: 'about', component: AboutComponent},
    {path: 'calculator', component: CalculatorComponent, canActivate: [authGuard]},
    {path: '**', component: NotfoundComponent} 
];
