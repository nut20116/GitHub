import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MyhomePage } from './myhome.page';

describe('MyhomePage', () => {
  let component: MyhomePage;
  let fixture: ComponentFixture<MyhomePage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyhomePage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MyhomePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
