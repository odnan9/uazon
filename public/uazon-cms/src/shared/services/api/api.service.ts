import { Injectable } from "@angular/core";
import {
    HttpClient,
    HttpHeaders,
    HttpBackend,
    HttpRequest,
} from "@angular/common/http";
import { env } from "../../../environments/environment";
import { Observable } from "rxjs/Observable";
import {logger} from "codelyzer/util/logger";
import {log} from "util";

const passthrough = ["login", "signup"];
const httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
}

@Injectable()
export class ApiService {
    token: string = "";

    constructor(private http:HttpClient) {}

    get(url, params = {}) {
        // const options: any = {};
        const apiUrl = ApiService.buildUrl(url);
        log(apiUrl);

        // options.params = this.toQuery(params);
        // if (passthrough.indexOf(url) === -1) {
        //     if (!this.token) {
        //         return Observable.throw({ message: "Must login" });
        //     }
        //     options.headers = new Headers();
        //     options.headers.set("Authorization", `Bearer ${this.token || ""}`);
        // }
        return this.http.get(apiUrl);
    }
    post(url, params = {}) {
        const apiUrl = ApiService.buildUrl(url);
        const body = this.toBody(params);
        // if (passthrough.indexOf(url) === -1) {
        //     // firmamos
        // }
        return this.http.post(apiUrl, body).map(res => res);
    }
    put(url, params = {}) {
        const apiUrl = ApiService.buildUrl(url);
        const body = this.toBody(params);
        // if (passthrough.indexOf(url) === -1) {
        //     // firmamos
        // }
        return this.http.put(apiUrl, body).map(res => res);
    }
    delete(url) {
        const apiUrl = ApiService.buildUrl(url);
        if (passthrough.indexOf(url) === -1) {
            // firmamos
        }
        return this.http.delete(apiUrl).map(res => res);
    }

    login(user: string, password: string) {
        // this.post("login", { user, password }).do(res => (this.token = res.token));
    }

    logout() {
        this.post("logout").do(() => (this.token = ""));
    }

    static buildUrl(path) {
        return ApiService.isBasePath(path) ? path : `${env.apiPath}/${path}`;
    }

    static isBasePath(path) {
        return path.startsWith("http://") || path.startsWith("https://");
    }

    private toBody = (params: Object): string =>
        params ? JSON.stringify(params) : "";

    private toQuery(
        params: Object | any[],
        key: string = null,
        search = new URLSearchParams("")
    ): URLSearchParams {
        if (params === undefined) {
            return search;
        }
        if (params instanceof Array && key) {
            // If it is an array, add brackets with the indexes: param[0]: value
            params.forEach(
                (p, i) => (search = this.toQuery(p, `${key}[${i}]`, search))
            );
        } else if (params instanceof Object) {
            // If it is an object, add brackets wit the keys: param[key]: value
            Object.keys(params).forEach(
                objKey =>
                    (search = this.toQuery(
                        params[objKey],
                        key ? `${key}[${objKey}]` : objKey,
                        search
                    ))
            );
        } else if (key) {
            // If the value is not an object nor and array, just append it with its key
            if (params === true) {
                // Transforming trues to 1
                search.append(key, "1");
            } else if (params === false) {
                // And falses to 0 (if necessary)
                search.append(key, "0");
            } else {
                search.append(key, params);
            }
        }
        return search;
    }
}

