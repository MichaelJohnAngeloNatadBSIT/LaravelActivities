import { NgModule } from "@angular/core";
import { Routes } from "@angular/router";
import { DashboardComponent } from "./components/dashboard/dashboard.component";
import { StudentsComponent } from "./components/students/students.component";

const routes: Routes = [
  { path: 'dashboard', component: DashboardComponent },
  { path: 'students', component: StudentsComponent },
  { path: '', redirectTo: 'dashboard', pathMatch: 'full' }
]

@NgModule({
  imports: [],
  exports: []
})
export class MainRoutingModule { }