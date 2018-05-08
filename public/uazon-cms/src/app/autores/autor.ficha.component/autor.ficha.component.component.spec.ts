import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Autor.Ficha.ComponentComponent } from './autor.ficha.component.component';

describe('Autor.Ficha.ComponentComponent', () => {
  let component: Autor.Ficha.ComponentComponent;
  let fixture: ComponentFixture<Autor.Ficha.ComponentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Autor.Ficha.ComponentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Autor.Ficha.ComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
