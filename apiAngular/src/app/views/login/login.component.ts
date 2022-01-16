import { variable } from '@angular/compiler/src/output/output_ast';
import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { ApiService } from 'src/app/services/apiRest/api.service';
import { LoginI } from 'src/app/model/login.interface';
import { ResponseI } from 'src/app/model/response.interface';
import { Router } from '@angular/router'; 

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  loginForm = new FormGroup({
    usuario : new  FormControl('', Validators.required),
    password : new FormControl('', Validators.required)
  })
  constructor( private api:ApiService, private router:Router) { }

  errorStatus:boolean= false;
  errorMsj:any = "";
  ngOnInit(): void {
  }
  onLogin(form: LoginI){
    //call function in apiservice
    this.api.loginByEmail(form).subscribe(data =>{
      let dataResponse:ResponseI = data;
      if(dataResponse.status == "ok"){
        localStorage.setItem("token", dataResponse.result.token);
        this.router.navigate(['dasboard']);
      }else{
        this.errorStatus = true;
        this.errorMsj = dataResponse.result.error_msg;
        
      }
    })
  }
}
