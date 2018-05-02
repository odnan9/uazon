import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../shared/services/api/api.service';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { PassportComponent } from './passport/passport.component';


@NgModule({
    declarations: [
        AppComponent,
        PassportComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        FormsModule
    ],
    providers: [ ApiService ],
    bootstrap: [ AppComponent ]
})
export class AppModule { }
