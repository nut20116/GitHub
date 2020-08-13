import { Component } from '@angular/core';
import {HTTP} from '@ionic-native/http/ngx';


@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss']
})
export class Tab1Page {
  username;
  password;
  data = {
    'username_member': "ping",
    'password_member': "1234"
  };
  constructor(private http: HTTP) {

  }
  login() {
    console.log(this.data);
    this.http.post('http://localhost/apiFinal/usermember/login', JSON.stringify(this.data), {}).then(value => {
    console.log("sucess");
      console.log(this.data);
    }).catch(reason => {
      console.log("fail");
      console.log(this.data);
    });
  }

}
