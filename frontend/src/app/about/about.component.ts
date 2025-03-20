import { NgIf } from '@angular/common';
import { Component} from '@angular/core';
import { WritableSignal, signal } from '@angular/core';
import { ApiService } from '../api.service';
import { Router } from '@angular/router';
import { MatDialog } from '@angular/material/dialog';
import { Overlay } from '@angular/cdk/overlay';
import { CalculatorComponent } from '../calculator/calculator.component';

@Component({
  selector: 'app-about',
  imports: [NgIf],
  templateUrl: './about.component.html',
  styleUrl: './about.component.css'
})
export class AboutComponent {
  loggedIn: WritableSignal<boolean> = signal(false);

  constructor(public dialog: MatDialog, private overlay: Overlay,private service:ApiService, private router:Router) {
   
  }

  get isLoggedIn() {
    return this.service.loggedInUser();
  }
  loggedInUser(): boolean {
    /* if (localStorage.key != null)
    {
        return !this.loggedIn();

    } */
    return this.loggedIn();
  }

  login() {
    this.loggedIn.set(true);
    localStorage.setItem('user', JSON.stringify('user'));
  }

  logout() {
    this.loggedIn.set(false);
    localStorage.removeItem('user');
  }

  openModal(event: Event) {
      document.body.style.overflow = 'hidden';
      event.preventDefault();
      if (this.service.loggedInUser())
      {
        const dialogRef = this.dialog.open(CalculatorComponent, {
          width: '900px',
          height: '700px'
        });
      }
      else {
        this.router.navigate(['/login']);
        this.service.loggedInUser.set(true);
      }
        
    }
}
