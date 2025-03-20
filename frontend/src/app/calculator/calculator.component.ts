import { Component, Inject } from '@angular/core';
import{MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { CommonModule } from '@angular/common';
import { MatButtonModule } from '@angular/material/button';
import { ApiService } from '../api.service';
import { Etel } from '../model/etel';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-calculator',
  imports: [CommonModule, MatButtonModule, FormsModule],
  templateUrl: './calculator.component.html',
  styleUrl: './calculator.component.css'
})
export class CalculatorComponent {

  etel: Etel[]=[];
  constructor(
    public dialogRef: MatDialogRef<CalculatorComponent>,
    @Inject(MAT_DIALOG_DATA) public data: { message: string },

    private service: ApiService
  ) {
  }

  close() {
    this.dialogRef.close();
  }

  ngOnInit(): void {
    this.getEtelek(); 
  }

  getEtelek(){
    this.service.etelek().subscribe(data => {
      this.etel=data;
      console.log(this.etel);
    });
  }
  searchText: string = '';
  
 

  filteredEtel() {
    return this.etel.filter(i => 
      i.etelNev.toLowerCase().includes(this.searchText.toLowerCase())
    );

  }
}
