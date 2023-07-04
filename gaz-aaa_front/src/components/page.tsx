import { ReactNode } from 'react';

import Footer from '@components/layouts/footer';
import Header from '@components/layouts/header';

interface Props {
  children: ReactNode;
}

export default function LayoutPage({ children }: Props) {
  return (
    <div>
      <Header />
      <div className="Contents">{children}</div>
      <Footer />
    </div>
  );
}
