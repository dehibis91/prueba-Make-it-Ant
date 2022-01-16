import { Injectable } from '@angular/core';
import { LoginI } from 'src/app/model/login.interface';
import { ResponseI } from 'src/app/model/response.interface';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { LoginComponent } from 'src/app/views/login/login.component';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  url:string = "http://127.0.0.1:8000/api/";
  constructor( private http:HttpClient) { }

  loginByEmail(form:LoginI):Observable<ResponseI>{
    let address = this.url + "auth";
    return this.http.post<ResponseI>(address, form);
  }

}
