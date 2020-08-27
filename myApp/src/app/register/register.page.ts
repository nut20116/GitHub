import { Component, OnInit } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Router} from "@angular/router";

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {
  username: any;
  password: any;
  email: any;
  firstname: any;
  lastname: any;
  telephone: any;
  address: any;
  status: any;



  constructor(private Http: HttpClient,private router: Router) { }

  ngOnInit() {
  }


  register() {
    let dataJSON = {
      'username_member': this.username,
      'password_member': this.password,
      "firstname_member": this.firstname,
      "lasname__member": this.lastname,
      "email_member": this.email,
      "address_member": this.address,
      "telephone_member": this.telephone,
      "status_member": this.status
    };
    console.log(dataJSON);
    this.Http.post('http://localhost/apiFinal/usermember/register',JSON.stringify(dataJSON)).subscribe(data =>{
      console.log("register complete");
      let navigate = this.router.navigate(['/login']);
      console.log(data);
      window.alert("register complete");
    },error => {
      let navigate = this.router.navigate(['/login']);
      console.log(error);
      window.alert("register fail");
    });
  }
}
