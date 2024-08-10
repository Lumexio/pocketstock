import axios from "axios";
import store from "@/store";
axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://127.0.0.1:8000/";


export function getCategorys(categoryArray) {
  return new Promise((resolve, reject) => {
    axios
      .get("api/category")
      .then(response => {
        const category = response.data;
        const stats = response.status;
        category.forEach((element) => {
          let datos = {
            id: element.id,
            name: element.name,
            description: element.description,
          };
          if (!datos) return;
          categoryArray.push(datos);
        });
        resolve({
          stats, categoryArray
        });
      })
      .catch((error) => { console.log(error); reject(error); });
  });
}
export function postCategorys(enviar) {

  axios
    .post("api/category", enviar, {
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
export function deleteCategory(id) {
  axios.delete("api/category/" + id).catch((error) => console.log(error));
}
export function editCategory(url) {
  axios
    .put(url)
    .then((response) => {
      response;
    })
    .catch((error) => console.log(error));
}

export default { getCategorys, postCategorys, deleteCategory, editCategory }