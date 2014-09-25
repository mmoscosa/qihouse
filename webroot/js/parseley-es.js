// ParsleyConfig definition if not already set
window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig.i18n = window.ParsleyConfig.i18n || {};

window.ParsleyConfig.i18n.es = $.extend(window.ParsleyConfig.i18n.es || {}, {
  defaultMessage: "Este campo parece ser inválido.",
  type: {
    email:        "Este campo debe ser un correo válido.",
    url:          "Este campo debe ser una URL válida.",
    number:       "Este campo debe ser un número válido.",
    integer:      "Este campo debe ser un número válido.",
    digits:       "Este campo debe ser un dígito válido.",
    alphanum:     "Este campo debe ser alfanumérico."
  },
  notblank:       "Este campo no debe estar en blanco.",
  required:       "Este campo es requerido.",
  pattern:        "Este campo es incorrecto.",
  min:            "Este campo no debe ser menor que %s.",
  max:            "Este campo no debe ser mayor que %s.",
  range:          "Este campo debe estar entre %s y %s.",
  minlength:      "Este campo es muy corto. La longitud mínima es de %s caracteres.",
  maxlength:      "Este campo es muy largo. La longitud máxima es de %s caracteres.",
  length:         "La longitud de este campo debe estar entre %s y %s caracteres.",
  mincheck:       "Debe seleccionar al menos %s opciones.",
  maxcheck:       "Debe seleccionar %s opciones o menos.",
  check:          "Debe seleccionar entre %s y %s opciones.",
  equalto:        "Este campo debe ser idéntico."
});

// If file is loaded after Parsley main file, auto-load locale
if ('undefined' !== typeof window.ParsleyValidator)
  window.ParsleyValidator.addCatalog('es', window.ParsleyConfig.i18n.es, true);
