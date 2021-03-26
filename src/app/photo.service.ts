import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PhotoService {

  constructor(private httpClient: HttpClient) { }

  postImage(fd : FormData): Observable<string>{
    return this.httpClient.post<string>('http://localhost/photo/postImage.php', fd );
  }

  getImage(): Observable<Blob> {
    return this.httpClient.get( 'http://localhost/photo/getImage.php', { responseType: 'blob' })      
 }
}