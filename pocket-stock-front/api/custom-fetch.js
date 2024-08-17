export const customFetch = async (url, options = {}, baseUrl) => {


 const token = useStore();

 const headers = {
  ...options.headers,
  'Authorization': `Bearer ${token.isAuthenticated}`,
 };
 const response = await fetch(`${baseUrl}` + url, {
  ...options,
  headers,
 });
 if (!response.ok) {
  throw new Error('Network response was not ok');
 }

 return response.json();
};