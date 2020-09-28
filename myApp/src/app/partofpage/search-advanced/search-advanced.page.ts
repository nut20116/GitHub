import { Component, OnInit } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-search-advanced',
  templateUrl: './search-advanced.page.html',
  styleUrls: ['./search-advanced.page.scss'],
})
export class SearchAdvancedPage implements OnInit {
  time: any;
  timeMin: any = 100;
  timeMax: any = 200;
  timeMin2: any;
  timeMax2: any;
  selectedprovince: any;
  mySelectprovince: any;
  selectedamphures: any;
  mySelectamphures: any;


  constructor(private Http: HttpClient) {
    this.timeMin2 = this.timeMin;
    this.timeMax2 = this.timeMax;
    this.Http.get('http://localhost/apiFinal/province')
        .subscribe(data => {
          this.selectedprovince = data;
          console.log(this.selectedprovince);
        });
  }

  ngOnInit() {

  }
  setBadge(time) {
    this.timeMin2 = time.lower;
    this.timeMax2 = time.upper;
  }

  selectedprovincemethod(select: any) {
    console.log(select);
    let dataJSON = {
      'PATIENT_ID': select,
    };
    this.Http.post('http://localhost/apiFinal/amphures',JSON.stringify(dataJSON))
        .subscribe(data => {
          this.selectedamphures = data;
          console.log(this.selectedamphures);
        },error => {
          let navigate = this.router.navigate(['/login']);
          console.log("login error");
          window.alert("login fail");
        });
  }

  selectedamphuresmethod(mySelectamphures: any) {
    console.log(mySelectamphures);
  }
}
