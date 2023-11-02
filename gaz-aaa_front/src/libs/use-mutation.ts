import { useState } from 'react';

interface UseMutationState<T> {
  loading: boolean;
  data?: T;
  error?: object;
}
type MethodType = 'POST' | 'PUT' | 'PATCH' | 'DELETE';
type UseMutationStateWithClean<T> = UseMutationState<T> & {
  clear: () => void;
};
type UseMutationResult<T> = [(data: object, method?: MethodType, apiURL?: string) => void, UseMutationStateWithClean<T>];

export default function useMutation<T = object>(url: string): UseMutationResult<T> {
  const [state, setState] = useState<UseMutationState<T>>({
    loading: false,
    data: undefined,
    error: undefined,
  });
  function mutation(formData: object, method: MethodType = 'POST', apiURL = url) {
    setState((prev) => ({ ...prev, loading: true }));
    fetch(apiURL, {
      method,
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(formData),
    })
      .then((response) => response.json().catch(() => null))
      .then((data) => setState((prev) => ({ ...prev, data, loading: false })))
      .catch((error) => setState((prev) => ({ ...prev, error, loading: false })));
  }
  function clear() {
    setState({
      loading: false,
      data: undefined,
      error: undefined,
    });
  }
  return [mutation, { ...state, clear }];
}
