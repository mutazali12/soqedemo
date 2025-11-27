"use client"

import { Hero } from "@/components/sections/hero"
import { Features } from "@/components/sections/features"
import { ProductShowcase } from "@/components/sections/product-showcase"
import { Pricing } from "@/components/sections/pricing"
import { CTA } from "@/components/sections/cta"
import { Footer } from "@/components/sections/footer"
import { Header } from "@/components/sections/header"

export default function Home() {
  return (
    <div className="min-h-screen bg-background">
      <Header />
      <Hero />
      <ProductShowcase />
      <Features />
      <Pricing />
      <CTA />
      <Footer />
    </div>
  )
}
