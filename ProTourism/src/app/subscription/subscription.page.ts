import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-subscription',
  templateUrl: './subscription.page.html',
  styleUrls: ['./subscription.page.scss'],
})
export class SubscriptionPage implements OnInit {
  estado = 0;
  datos: any = {
    documento: '',
    nombre: '',
    telefono: '',
    comercio: '',
    correo: '',
    tipo_id: null,
    plan_id: null,
  };

  constructor(
    private http: HttpClient,
    private alertController: AlertController
  ) {}

  ngOnInit() {}

  guardarSuscripcion() {
    const datos = new FormData();

    datos.append('documento', this.datos.documento);
    datos.append('nombre', this.datos.nombre);
    datos.append('telefono', this.datos.telefono);
    datos.append('comercio', this.datos.comercio);
    datos.append('correo', this.datos.correo);
    datos.append('tipo_id', this.datos.tipo_id.toString());
    datos.append('plan_id', this.datos.plan_id.toString()); // Asegúrate de convertir a cadena si es un número

    // Realizar la solicitud POST
    this.http
      .post('http://localhost/ProTuristico/controller/guardar.php', datos)
      .subscribe(
        (response) => {
          console.log('Guardado con exito',response);
          this.mostrarAlerta('Solicitud', 'Solicitud Enviada Exitoxamente.');
          this.clearFiels();
        },
        (error) => {
          console.error('Error:', error);
        }
      );
  }

  // guardarSuscripcion() {
  //   var endpoint = 'http://172.16.20.160:8080/cliente/guardar';

  //   fetch(endpoint, {
  //     method: 'POST',
  //     mode: 'cors',
  //     headers: { 'Content-type': 'application/json' },
  //     body: JSON.stringify({
  //       documento: this.datos.documento,
  //       nombre: this.datos.nombre,
  //       telefono: this.datos.telefono,
  //       comercio: this.datos.comercio,
  //       correo: this.datos.correo,
  //       tipo_id: this.datos.tipo_id,
  //       plan_id: this.datos.plan_id,
  //     }),
  //   })
  //     .then((response) => {
  //       console.log('Guardado con exito', response);
  //       this.mostrarAlerta('Solicitud', 'Solicitud Enviada Exitoxamente.');
  //     })
  //     .catch((error) => {
  //       console.error('Error:', error);
  //     });
  // }

  async mostrarAlerta(titulo: string, mensaje: string) {
    const alert = await this.alertController.create({
      header: titulo,
      message: mensaje,
      buttons: ['Aceptar'],
    });

    await alert.present();
  }

  isFormValid(): boolean {
    // Verifica si todos los campos del formulario están llenos y si el tipo y el plan han sido seleccionados.
    return (
      this.datos.documento &&
      this.datos.nombre &&
      this.datos.telefono &&
      this.datos.comercio &&
      this.datos.correo &&
      this.datos.tipo_id !== null &&
      this.datos.plan_id !== null
    );
  }

  clearFiels() {
    this.datos.documento = ''
    this.datos.nombre = ''
    this.datos.telefono = ''
    this.datos.comercio = ''
    this.datos.correo = ''
    this.datos.tipo_id = ''
    this.datos.plan_id = ''
  }
}
