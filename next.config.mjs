// next.config.mjs
const nextConfig = { // يجب أن يكون 'const' بأحرف صغيرة
  typescript: {
    ignoreBuildErrors: true,
  },
  images: {
    unoptimized: true,
  },
  output: 'export',
  // تأكد من أن basePath هو اسم مستودعك
  basePath: '/soqedemo', 
  trailingSlash: true,
  reactStrictMode: true,
}

export default nextConfig
