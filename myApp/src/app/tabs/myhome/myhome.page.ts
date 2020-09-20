import { Component, OnInit } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-myhome',
  templateUrl: './myhome.page.html',
  styleUrls: ['./myhome.page.scss'],
})
export class MyhomePage implements OnInit {
    getstore: any;




  constructor(private Http: HttpClient) {

    this.Http.get('http://localhost/apiFinal/getstore')
        .subscribe(data => {
            this.getstore = data;
        });
  }

  ngOnInit() {
  }

    clickstore() {

    }
}
