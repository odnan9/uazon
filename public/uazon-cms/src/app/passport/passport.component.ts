import { Component, OnInit } from '@angular/core';
import { HttpClientModule, HttpHeaders, HttpResponse, HttpParams } from '@angular/common/http';
import 'rxjs/add/operator/map';
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-passport',
  templateUrl: './passport.component.html',
  styleUrls: ['./passport.component.css']
})
export class PassportComponent implements OnInit {

    private books;
    private oAuthURL = "http://localhost:8000/oauth/token";
    private apiURL = "http://localhost:8000/api/autores";
    private accessToken = [];
    private headers = new HttpHeaders()
        .set('Content-Type', 'application/json')
        .set('Accept', 'application/json');
    private params = new HttpParams();

    private postData = {
        grant_type: "password",
        client_id: 2,
        client_secret: "KcqzXmk1a650lmvMCyj3dVjGScyBmtPCsjnBkAWr",
        username: "test@test.com",
        password: "123456"
    }

    constructor(private http: HttpClient) {}

    private options = {headers: this.headers, params: this.params};

    ngOnInit(): void {
        this.getToken()
            .subscribe(data => {
                this.setToken(data);
                setTimeout(() => {
                    this.getBooks()
                        .subscribe(data => this.books = data);
                }, 100);
            });
    }

    getToken() {
        return this.http.post(this.oAuthURL, this.postData, this.options)
            .map(response => response);
    }

    setToken(token) {
        this.headers = new HttpHeaders()
            .set('Content-Type', 'application/json')
            .set('Accept', 'application/json')
            .set('Authorization', 'Bearer ' + token.access_token);
        this.options = {headers: this.headers, params: this.params};
        this.accessToken = token.access_token;
    }

    getBooks() {
        return this.http.get(this.apiURL, this.options).map(response => response);
    }
}
