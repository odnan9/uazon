import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { HttpHeaders } from "@angular/common/http";
import { HttpParams } from "@angular/common/http";
import { env } from "../../../../environments/environment";
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/do';

@Injectable()
export class ApiService {
  public accessToken = "";
  public headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Accept', 'application/json');
  public params = new HttpParams();
  public options = {};

  constructor(private _http: HttpClient) { }

  public prepareAPICall() {
    return this.getToken()
      .do(data => {
        this.setToken(data);
      });
  }

  public getToken() {
    return this._http.post(env.oAuthURL, env.postData, this.getOptions())
      .map(response => response);
  }

  public setToken(token) {
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Accept', 'application/json')
      .set('Authorization', 'Bearer ' + token.access_token);
    this.options = {headers: headers, params: this.params};
    this.accessToken = token.access_token;
    localStorage.setItem('uazon_api_token', token.access_token);
  }

  public get(apiEndpoint) {
    return this._http.get(env.apiPath + apiEndpoint, this.options).map(response => response);
  }

  public post(apiEndpoint, postData) {
    return this._http.post(env.apiPath + apiEndpoint, postData, this.getOptions()).map(response => response);
  }

  public put(apiEndpoint, postData) {
    return this._http.put(env.apiPath + apiEndpoint, postData, this.getOptions()).map(response => response);
  }

  public delete(apiEndpoint, postData) {
    return this._http.delete(env.apiPath + apiEndpoint, this.getOptions()).map(response => response);
  }

  public getOptions() {
    return this.options;
  }
}

