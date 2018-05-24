import { Injectable, Output, EventEmitter } from '@angular/core';
import { Router } from '@angular/router';
import { env } from "../../../environments/environment";
import { HttpClient, HttpHeaders, HttpParams } from "@angular/common/http";

@Injectable()
export class UserAccessService {
  @Output() getLoggedInUser: EventEmitter<any> = new EventEmitter();
  LocalStorageService;
  headers = new HttpHeaders()
  .set('Content-Type', 'application/json')
  .set('Accept', 'application/json');
  params = new HttpParams();
  options = {};
  token: string = "";

  constructor(private _http: HttpClient, private router: Router) {
    this.LocalStorageService = localStorage;
  }

  public isLoggedIn() {
    return localStorage.getItem('uazon_token');
  }

  public login(user, password) {
    return this.getToken(user, password)
    .do(data => {
      this.setToken(data);
    });
  }

  public getToken(user, password) {
    let postData = env.postData;
    postData['username'] = user;
    postData['password'] = password;
    let token = this._http.post(env.oAuthURL, postData, this.getOptions())
    .map(response => response);
    return token;
  }

  public setToken(token) {
    let headers = new HttpHeaders()
    .set('Content-Type', 'application/json')
    .set('Accept', 'application/json')
    .set('Authorization', 'Bearer ' + token.access_token);
    this.options = { headers: headers, params: this.params };
    this.getUSerData().subscribe(
      data => {
        this.LocalStorageService.setItem('uazon_token', token.access_token);
        this.LocalStorageService.setItem('uazon_user', data['name']);
        this.getLoggedInUser.emit(data);
      },
      error => {
        console.error(error);
        this.getLoggedInUser.emit({name: "Login"});
      }
    );
  }

  public getUSerData() {
    let answer = this._http.get(env.apiPath + 'user', this.options).map(response => response);
    return answer;
  }

  public logout() {
    this.LocalStorageService.removeItem("uazon_token");
    this.LocalStorageService.removeItem("uazon_user");
    this.getLoggedInUser.emit({name: "Login"});
    this.router.navigate(["login"]);
  }

  public setOptions(headers, params) {
    this.options = { headers: headers, params: params };
  }

  public getOptions() {
    return this.options;
  }
}
