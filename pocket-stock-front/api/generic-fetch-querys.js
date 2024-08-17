import { customFetch } from '@/api/custom-fetch';
import { useRuntimeConfig } from '#app';
export function useGenericFetchQueries(endpoint, enabled = true) {
  const queryClient = useQueryClient();
  const config = useRuntimeConfig();
  const baseURL = config.public.baseUrl;


  const fetchQuery = useQuery({
    queryKey: [endpoint],
    queryFn: () => customFetch(endpoint, {}, baseURL),
    enabled: enabled,
  });


  const createMutation = useMutation({
    mutationFn: (newData) => customFetch(endpoint, { credentials: 'include', method: "POST", body: JSON.stringify(newData), headers: { 'Content-Type': 'application/json' } }, baseURL),
    onSuccess: () => {
      queryClient.invalidateQueries([endpoint]);
    },
  });

  const updateMutation = useMutation({
    mutationFn: (updatedData) => customFetch(`${endpoint}/${updatedData.id}`, { credentials: 'include', method: "PUT", body: JSON.stringify(updatedData), headers: { 'Content-Type': 'application/json' } }, baseURL),
    onSuccess: () => {
      queryClient.invalidateQueries([endpoint]);
    },
  });

  const deleteMutation = useMutation({
    mutationFn: (id) => customFetch(`${endpoint}/${id}`, { credentials: 'include', method: "DELETE" }, baseURL),
    onSuccess: () => {
      queryClient.invalidateQueries([endpoint]);
    },
  });

  return { fetchQuery, createMutation, updateMutation, deleteMutation };
}