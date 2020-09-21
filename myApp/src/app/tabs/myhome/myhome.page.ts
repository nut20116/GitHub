import { Component, OnInit } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-myhome',
  templateUrl: './myhome.page.html',
  styleUrls: ['./myhome.page.scss'],
})
export class MyhomePage implements OnInit {
    getstore: any;
    idstore: any;
    getfield: any;



  constructor(private Http: HttpClient) {

    this.Http.get('http://localhost/apiFinal/getstore')
        .subscribe(data => {
            this.getstore = data;
            console.log(this.getstore);
        });
  }

  ngOnInit() {
  }

    clickstore(idstore) {
      console.log(idstore);
        let dataJSON = {
            'id_store': idstore,
        };
        this.Http.post('http://localhost/apiFinal/getfield',JSON.stringify(dataJSON))
            .subscribe(data => {
                this.getfield = data;
                console.log(this.getfield);
            });
    }
}
