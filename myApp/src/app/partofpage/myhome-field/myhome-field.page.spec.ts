import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MyhomeFieldPage } from './myhome-field.page';

describe('MyhomeFieldPage', () => {
  let component: MyhomeFieldPage;
  let fixture: ComponentFixture<MyhomeFieldPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyhomeFieldPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MyhomeFieldPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
