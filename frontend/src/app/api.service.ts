import { Injectable, signal } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Etel } from './model/etel';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = 'http://localhost:8000/api'; 
  loggedInUser = signal<boolean>(false);
  constructor(private http: HttpClient) {
    const user = localStorage.getItem('user');
    if (user) {
      this.loggedInUser.set(true);
    }
  }


  register(user: any): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/regisztraciok`, user);
  }

 
  login(user: any): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/login`, user);
  }

  etelek(): Observable<Etel[]> {
    return this.http.get<Etel[]>(`${this.apiUrl}/etelek`);
  }
}