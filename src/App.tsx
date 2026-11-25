import { Navbar } from './components/Navbar';
import { Hero } from './components/Hero';
import { ServicesSection } from './components/ServicesSection';
import { ProfileAndWaterSection } from './components/ProfileAndWaterSection';
import { NewsSection } from './components/NewsSection';
import { PartnersAndContact } from './components/PartnersAndContact';

export function App() {
  return (
    <div className="min-h-screen flex flex-col bg-slate-50 text-slate-900">
      <Navbar />
      <main className="flex-1">
        <Hero />
        <ServicesSection />
        <ProfileAndWaterSection />
        <NewsSection />
      </main>
      <PartnersAndContact />
    </div>
  );
}

export default App;
