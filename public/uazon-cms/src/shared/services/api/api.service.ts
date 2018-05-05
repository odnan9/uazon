import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { HttpHeaders } from "@angular/common/http";
import { HttpParams } from "@angular/common/http";
import { env } from "../../../environments/environment";
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/do';

@Injectable()
export class ApiService {
    public recoveredData;
    accessToken = "";
    headers = new HttpHeaders()
        .set('Content-Type', 'application/json')
        .set('Accept', 'application/json');
    params = new HttpParams();
    options = {};
    options2 = {};
    token: string = "";

    constructor(private _http: HttpClient) {}

    public getData() {
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
        this.setAccessToken(token.access_token);
    }

    public get(apiEndpoint) {
        return this._http.get(env.apiPath + apiEndpoint, this.options).map(response => response);
    }

    public setAccessToken(token) {
        this.accessToken = token;
    }

    public getAccessToken() {
        return this.accessToken;
    }

    public setRecovetedData(data) {
        this.recoveredData = data;
    }

    public getRecoveredData() {
        return this.recoveredData;
    }

    public setOptions(headers, params) {
        this.options = {headers: headers, params: params};
    }

    public getOptions() {
        return this.options;
    }

}

