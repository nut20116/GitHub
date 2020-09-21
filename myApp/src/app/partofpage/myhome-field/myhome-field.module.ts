import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MyhomeFieldPageRoutingModule } from './myhome-field-routing.module';

import { MyhomeFieldPage } from './myhome-field.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    MyhomeFieldPageRoutingModule
  ],
  declarations: [MyhomeFieldPage]
})
export class MyhomeFieldPageModule {}
