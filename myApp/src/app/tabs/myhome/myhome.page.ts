import { Component, OnInit } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Router} from "@angular/router";
import {DatapassService} from '../../datapass.service';

@Component({
  selector: 'app-myhome',
  templateUrl: './myhome.page.html',
  styleUrls: ['./myhome.page.scss'],
})
export class MyhomePage implements OnInit {
    declare getstore: any;
    declare getfield: any;



  constructor(private Http: HttpClient, private router: Router, private data: DatapassService) {

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
        this.Http.post('http://localhost/apiFinal/getingfield',JSON.stringify(dataJSON))
            .subscribe(data => {
                this.getfield = data;
                console.log(this.getfield);
                this.data.getfield = this.getfield;
                let navigate = this.router.navigate(['/myhome-field']);
            });
  }
}
