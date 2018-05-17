import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UsuariosFichaComponent } from './usuarios-ficha.component';

describe('UsuariosFichaComponent', () => {
  let component: UsuariosFichaComponent;
  let fixture: ComponentFixture<UsuariosFichaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UsuariosFichaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UsuariosFichaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
