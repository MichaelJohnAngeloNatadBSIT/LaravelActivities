import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { MaterialModules } from "../modules/material.module";
import { DashboardComponent } from "./components/dashboard/dashboard.component";
import { StudentsComponent } from "./components/students/students.component";
import { MainRoutingModule } from "./main.routing.module";

@NgModule({
  declarations: [
    DashboardComponent,
    StudentsComponent
  ],
  imports: [
    CommonModule,
    MaterialModules,
    MainRoutingModule
  ]
})
export class MainModule { }