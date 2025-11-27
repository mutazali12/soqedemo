Const nextConfig = {
  typescript: {
    ignoreBuildErrors: true,
  },
  images: {
    unoptimized: true,
  },
  output: 'export',
  // يجب تعديل هذا السطر
  basePath: '/soqedemo',
  trailingSlash: true,
  reactStrictMode: true,
}

export default nextConfig
