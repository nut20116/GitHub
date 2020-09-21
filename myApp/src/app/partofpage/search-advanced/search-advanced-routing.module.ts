import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SearchAdvancedPage } from './search-advanced.page';

const routes: Routes = [
  {
    path: '',
    component: SearchAdvancedPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SearchAdvancedPageRoutingModule {}
