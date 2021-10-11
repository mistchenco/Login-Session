$(document).ready(function () {
$('#tp5ejercicio2').bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fas fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    usNombre: {
      validators: {
        notEmpty: {
          message: "Ingrese un usuario",
        },
        stringLength: {
          min: 5,
          //max: 12,
          message: "El usuario debe tener como mínimo 5 caracteres",
        },
      },
    },
    usPass: {
      validators: {
        notEmpty: {
          message: "ingrese una contraseña",
        },
        stringLength: {
          min: 8,
          max: 12,
          message: "La contraseña debe tener como mínimo 8 caracteres",
        },
        regexp: {
          regexp: /^[a-z0-9]{6,10}$/,
          message: "La contraseña debe ser letras minúsculas + números",
        },
        different: {
          // diferente: la contraseña no puede ser la misma que el usuario
          message: "Usuario y contraseña no pueden ser iguales",
          field: "usNombre", // valor de campo comparado
        },
      },
    },
  },
});
});

