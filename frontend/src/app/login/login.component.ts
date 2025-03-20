import { Component, signal, Signal } from '@angular/core';
import { ApiService } from '../api.service';
import { Router } from '@angular/router';
import { FormsModule} from '@angular/forms';
import { NgClass, NgIf } from '@angular/common';
import { MatButton } from '@angular/material/button';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';

@Component({
  selector: 'app-login',
  imports: [FormsModule, NgClass, MatFormFieldModule, MatInputModule,NgIf],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  loggedInUser = signal(false);

  isActive = false;

  user = {
    email: '',
    jelszo: '',
    felhasznaloNev: '',
    testsuly:'',
    testmagassag:'',
    eletkor:''
  };

  userInput: string = '';
  constructor(private service: ApiService, private router: Router) {}

  toggleRegister(): void {

    this.isActive = true;
    this.user.jelszo='';
    this.user.felhasznaloNev='';
  }
  
  toggleLogin(): void {
    this.isActive = false;
    this.user.jelszo='';
    this.user.felhasznaloNev='';
  }

  registration() {
    this.service.register(this.user).subscribe(
      response => {
        console.log('Regisztráció sikeres:', response);
        alert('Sikeres regisztráció!');
        this.router.navigate(['login']); 
      },
      error => {
        console.error('Regisztráció hiba:', error);
        alert('Hiba történt a regisztráció során!');
      }
    );
  }

  login() {
    this.service.login(this.user).subscribe(
      response => {
        console.log('Bejelentkezés sikeres:', response);
        localStorage.setItem('user', JSON.stringify(response.user)); 
        this.loggedInUser.set(true);
        console.log("Bejelentkezve:", this.service.loggedInUser());
        this.router.navigate(['home']); // Visszanavigálunk a főoldalra
      },
      error => {
        console.error('Bejelentkezés hiba:', error);
        alert('Hibás felhasználónév vagy jelszó!');
      }
    );
  }

  logout() {
    this.user = {
      email: '',
      jelszo: '',
      felhasznaloNev: '',
      testsuly:'',
      testmagassag:'',
      eletkor:''
    };
    localStorage.removeItem('user');
    this.loggedInUser.set(false);
    this.router.navigate(['/login']);
  }

}