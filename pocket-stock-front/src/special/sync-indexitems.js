export function tiposync(itemstt, selectt, recived) {
 var tempid = "";
 var tempname = "";
 tempname;

 if (itemstt) {
  let tipo = itemstt;

  tipo.forEach((element) => {
   let datos = {
    id: element.id,
    name_tipo: element.name_tipo,
   };
   if (datos.name_tipo === recived) {
    tempid = datos.id;
    tempname = datos.name_tipo;
    selectt = tempid;
   }
  });
 }

 return selectt;
}
export function proveedorsync(itemsp, selectp, recived) {
 var tempid = "";
 var tempname = "";
 tempname;

 if (itemsp) {
  let proveedor = itemsp;
  proveedor.forEach((element) => {
   let datos = {
    id: element.id,
    name_proveedor: element.name_proveedor,
   };
   if (datos.name_proveedor === recived) {
    tempid = datos.id;
    tempname = datos.name_proveedor;

    selectp = tempid;
   }
  });
 }
 return selectp;
}
export function marcasync(itemstm, selectm, recived) {
 var tempid = "";
 var tempname = "";
 tempname;

 if (itemstm) {
  let marca = itemstm;
  marca.forEach((element) => {
   let datos = {
    id: element.id,
    name: element.name,
   };
   if (datos.name === recived) {
    tempid = datos.id;
    tempname = datos.name;

    selectm = tempid;
   }
  });
 }
 return selectm;
}
export function statusync(itemstst, selectst, recived) {
 var tempid = "";
 var tempname = "";

 tempname;
 if (itemstst) {
  let status = itemstst;
  status.forEach((element) => {
   let datos = {
    status_id: element.status_id,
    name: element.name,
   };

   if (datos.name === recived) {
    tempid = datos.status_id;
    tempname = datos.name;

    selectst = tempid;
   }
  });
 }
 return selectst;
}
export function racksync(itemsr, selectr, recived) {
 var tempid = "";
 var tempname = "";
 tempname;
 if (itemsr) {
  let rack = itemsr;
  rack.forEach((element) => {
   let datos = {
    id: element.id,
    name: element.name,
   };
   if (datos.name === recived) {
    tempid = datos.id;
    tempname = datos.name;

    selectr = tempid;
   }
  });
 }
 return selectr;
}
export function crossbarsync(itemsT, selectT, recived) {
 var tempid = "";
 var tempname = "";
 tempname;
 if (itemsT) {
  let rack = itemsT;
  rack.forEach((element) => {
   let datos = {
    id: element.id,
    name: element.name,
   };
   if (datos.name === recived) {
    tempid = datos.id;
    tempname = datos.name;

    selectT = tempid;
   }
  });
 }
 return selectT;
}
export function categsync(itemsc, selectc, recived) {

 var tempid = "";
 var tempname = "";
 tempname;
 if (itemsc) {
  let category = itemsc;
  category.forEach((element) => {
   let datos = {
    id: element.id,
    name: element.name,
   };
   if (datos.name === recived) {
    tempid = datos.id;
    tempname = datos.name;

    selectc = tempid;
   }
  });
 }
 return selectc;
}

export default { tiposync, categsync, statusync, crossbarsync, racksync, marcasync, proveedorsync }