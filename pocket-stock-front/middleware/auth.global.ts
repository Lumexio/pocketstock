function Authenticated(): boolean {
  const store = useStore();
  const token = store.isAuthenticated;
  return token !== '';
}

function hasRole(): number {
  const store = useStore();
  const role = store.role;
  return role;
}

export default defineNuxtRouteMiddleware((to, from) => {
  const isAuthenticated = Authenticated();
  const role = hasRole();

  if (!isAuthenticated && to.path !== '/login') {
    return navigateTo('/login');
  }

  if (isAuthenticated && role != 1 && to.path == '/user') {
    return navigateTo(from.path);
  }
});
