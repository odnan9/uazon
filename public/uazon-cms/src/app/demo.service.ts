import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

const httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable()
export class DemoService {

    constructor(private http:HttpClient) {}

    // Uses http.get() to load data from a single API endpoint
    getFoods() {
        return this.http.get('127.0.0.1:8000/api/autores');
    }

    getBooksAndMovies() {
        return Observable.forkJoin(
            this.http.get('127.0.0.1:8000/api/autores'),
            this.http.get('127.0.0.1:8000/api/autores')
        );
    }

    createFood(food) {
        let body = JSON.stringify(food);
        return this.http.post('/api/food/', body, httpOptions);
    }

    updateFood(food) {
        let body = JSON.stringify(food);
        return this.http.put('/api/food/' + food.id, body, httpOptions);
    }

    deleteFood(food) {
        return this.http.delete('/api/food/' + food.id);
    }
}