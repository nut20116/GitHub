import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SearchAdvancedPageRoutingModule } from './search-advanced-routing.module';

import { SearchAdvancedPage } from './search-advanced.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SearchAdvancedPageRoutingModule
  ],
  declarations: [SearchAdvancedPage]
})
export class SearchAdvancedPageModule {}
