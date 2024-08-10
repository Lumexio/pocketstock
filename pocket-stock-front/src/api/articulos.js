import axios from "axios";
import store from "@/store";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://127.0.0.1:8000/";


export function getProducts(productsArray) {
  return new Promise((resolve, reject) => {
    axios
      .get("api/product/list")
      .then((response) => {
        const products = response.data;
        const stats = response.status;
        products.forEach((element) => {
          let datos = {
            id: element.id,
            name: element.name,
            quantity: element.quantity,
            description: element.description, //pendiente
            name: element.name,
            name_tipo: element.name_tipo,
            name: element.name,
            name_proveedor: element.name_proveedor,
            name: element.name,
            //campos de ubicación
            name: element.name,
            name: element.name,
            foto_product: element.foto_product,
          };
          if (!datos) return;
          productsArray.push(datos);
        });
        resolve({
          stats, productsArray
        });
      })
      .catch((error) => { console.log(error); reject(error); });
  });
}
export function postProducts(enviar) {
  axios
    .post("api/product/create/", enviar, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    .then((response) => {
      if (response.statusText === "Created") {
        store.commit("setsuccess", true);

      }
    })
    .catch((e) => {
      console.log(e.message);
      if (e) {
        store.commit("setdanger", true);
      }
    });
}
export function deleteProducts(id) {
  axios.delete("api/product/delete/" + id).then((response) => { response; /*store.commit("increment", 1);*/ }).catch((error) => console.log(error));
}
export function editProducts(url, data) {
  axios
    .put(url, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    .then((response) => {
      console.log("Datos de edit:", response);
      if (response.statusText === "Created") {
        store.commit("setsuccess", true);
      }
      //store.commit("increment", 1);
    })
    .catch((error) => console.log(error));
}

export default { getProducts, postProducts, deleteProducts, editProducts }