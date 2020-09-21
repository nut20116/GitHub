import { Component, OnInit } from '@angular/core';
import {DatapassService} from '../../datapass.service';


@Component({
  selector: 'app-myhome-field',
  templateUrl: './myhome-field.page.html',
  styleUrls: ['./myhome-field.page.scss'],
})
export class MyhomeFieldPage implements OnInit {

  constructor(private datapass: DatapassService) {
      console.log(datapass.getfield);
  }

  ngOnInit() {
    // console.log(getfield);
  }


  clickfield(id_field: any) {
    
  }
}
