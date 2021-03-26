import { Component, OnInit } from '@angular/core';
import { PhotoService } from './photo.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent{

  imageUrl:any = null;
  photo!: Blob;
  
 
 constructor(private _service: PhotoService,
      public _DomSanitizationService: DomSanitizer) { }
 
 setPhoto(event:any){
     this.photo = event.target.files[0];
   }
 onClickSubmit(){
       const fd = new FormData();
       fd.append('stphoto',this.photo);
       this._service.postImage(fd).subscribe(res => console.log(res));
   }
 showImage(){
 
     this._service.getImage().subscribe((res) => { 
       this.photo = res;
       var myReader:FileReader = new FileReader();
       myReader.onloadend = (e) => {
         this.imageUrl = this._DomSanitizationService.bypassSecurityTrustUrl(<string>myReader.result);
       }
       myReader.readAsDataURL(this.photo);   
     });
   }    
 }
