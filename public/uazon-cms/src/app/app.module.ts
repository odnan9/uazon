import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../shared/services/api/api.service';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';


@NgModule({
    declarations: [
        AppComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        FormsModule
    ],
    providers: [ ApiService
        // {
        //     provide: ApiService,
        //     useFactory: (backend, options) => {
        //       return new ApiService(backend,options);
        //     }
        // }
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
