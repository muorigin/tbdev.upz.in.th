# URL Shortener Configuration Guide

## ⚠️ IMPORTANT SECURITY NOTICE

**BEFORE PROCEEDING:** Please review the [SECURITY_ADVISORY.md](SECURITY_ADVISORY.md) which documents critical phishing risks associated with `go.upz.in.th`. The advisory recommends **against using this service** due to detected malicious activity.

If you choose to proceed with URL shortening despite the security warnings, please ensure you understand the risks and implement additional security measures.

---

## Domain Selection Configuration

### Default Behavior
By default, the URL shortener script uses the platform's default domain. However, you can specify a custom domain for shortened links.

### Custom Domain Setup

#### Requirements:
- ✅ Domain must match exactly what's registered in your account
- ✅ Must include correct protocol (http/https)
- ✅ **Strongly recommended:** Use HTTPS for security
- ✅ Domain must be verified and controlled by you

#### Security Warnings:
- 🔴 **Verify domain ownership** before configuration
- 🔴 **Check API key authenticity** - ensure it comes from trusted sources
- 🔴 **Monitor for compromise** - domains can be hijacked
- 🔴 **Avoid illegal activities** - phishing, malware distribution, etc.
- 🔴 **Report suspicious activity** immediately to security team

#### Configuration Example:

```html
<script type="text/javascript">
var key = "fd2c4bb1939fcb32efe314d5f128dbb1";
var domain = "https://tbdev.upz.in.th";
</script>
<script type="text/javascript" src="https://go.upz.in.th/script.js"></script>
```

### Security Best Practices

#### 1. Domain Verification
```bash
# Verify domain ownership
nslookup yourdomain.com
# Check SSL certificate
openssl s_client -connect yourdomain.com:443
```

#### 2. API Key Security
- Store API keys securely (not in public repositories)
- Rotate keys regularly
- Monitor API usage for anomalies

#### 3. HTTPS Enforcement
- Always use HTTPS protocol
- Implement HSTS headers
- Redirect HTTP to HTTPS

#### 4. Monitoring & Alerts
- Set up alerts for unusual domain activity
- Monitor for unauthorized redirections
- Regular security audits

---

## Alternative Secure Solutions

Given the security concerns with `go.upz.in.th`, consider these alternatives:

### 1. Self-Hosted URL Shortener
- **Yourls** (PHP-based)
- **Polr** (Modern, feature-rich)
- **Shlink** (API-first)

### 2. Trusted Commercial Services
- Bitly (with enterprise security)
- TinyURL (basic, but established)
- Rebrandly (custom domains)

### 3. Built-in Solutions
- Use direct links without shortening
- Implement internal URL tracking
- Custom redirect scripts on your domain

---

## Implementation in TBDev Templates

### Current Status: REMOVED
The URL shortener scripts have been **completely removed** from:
- `templates/1/template.php`
- `templates/2/template.php`

### Re-implementation (Not Recommended)
If you must re-implement despite security warnings:

1. **Add to template head:**
```php
// In stdhead() function, within <head> tags
echo '<script type="text/javascript">
var key = "your-api-key";
var domain = "https://your-verified-domain.com";
</script>
<script type="text/javascript" src="https://trusted-shortener.com/script.js"></script>';
```

2. **Security measures:**
```php
// Add CSP headers
header("Content-Security-Policy: script-src 'self' https://trusted-shortener.com");
```

3. **Monitoring:**
```php
// Log all shortening activities
error_log("URL Shortener: " . $_SERVER['REQUEST_URI']);
```

---

## Risk Assessment

### High Risk Factors:
- ❌ Unknown third-party services
- ❌ Unverified API keys
- ❌ External script dependencies
- ❌ Potential for domain hijacking

### Mitigation Strategies:
- ✅ Use only verified, controlled domains
- ✅ Implement comprehensive monitoring
- ✅ Regular security audits
- ✅ User education and warnings
- ✅ Alternative authentication methods

---

## Emergency Response

If you suspect compromise:

1. **Immediate Actions:**
   - Remove all shortener scripts
   - Change API keys
   - Clear all caches
   - Notify users

2. **Investigation:**
   - Check server logs
   - Monitor network traffic
   - Verify domain ownership
   - Contact security team

3. **Recovery:**
   - Implement secure alternatives
   - Update security policies
   - User communication

---

## Conclusion

While URL shorteners can provide convenience, the security risks often outweigh the benefits, especially with third-party services. Consider whether the functionality is essential for your use case, and explore secure self-hosted alternatives if shortening is required.

**Recommendation:** Based on current security assessments, avoid using `go.upz.in.th` and similar external services. Use direct links or implement secure internal solutions instead.

---

*Last Updated: December 2024*
*Security Review: Required before implementation*