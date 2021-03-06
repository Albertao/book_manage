<table width="100%" height="100%" style="min-width: 348px;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr height="32px"></tr>
    <tr align="center">
        <td width="32px"></td>
        <td>
            <table border="0" cellspacing="0" cellpadding="0" style="max-width: 600px;">
                <tbody>
                <tr>
                    <td>
                        <table bgcolor="#4184F3" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 332px; max-width: 600px; border: 1px solid #E0E0E0; border-bottom: 0; border-top-left-radius: 3px; border-top-right-radius: 3px;">
                            <tbody>
                            <tr>
                                <td height="72px" colspan="3"></td>
                            </tr>
                            <tr>
                                <td width="32px"></td>
                                <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 24px; color: #FFFFFF; line-height: 1.25;">重新设置您的密码</td>
                                <td width="32px"></td></tr><tr><td height="18px" colspan="3"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table bgcolor="#FAFAFA" width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 332px; max-width: 600px; border: 1px solid #F0F0F0; border-bottom: 1px solid #C0C0C0; border-top: 0; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
                            <tbody>
                            <tr height="16px">
                                <td width="32px" rowspan="3"></td>
                                <td></td>
                                <td width="32px" rowspan="3"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="min-width: 300px;" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                                                <br><b>尊敬的{{ $user->name }}，您好！</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                                                您正在重置您的密码,现在您可能需要点击
                                                <a href="{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="text-decoration: none; color: #4285F4;" target="_blank">这个链接</a>来完成注册的最后一步。
                                                <br><br>
                                                <b>此活动不是您本人所为吗？</b>
                                                <br>那么请您无视这封邮件。
                                                <br>
                                        </tr>
                                        <tr height="32px"></tr>
                                        <tr>
                                            <td style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 13px; color: #202020; line-height: 1.5;">
                                                此致
                                                <br>开发者 AlbertHao 敬上
                                            </td>
                                        </tr>
                                        <tr height="16px"></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr height="32px"></tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr height="16"></tr>
                <tr>
                    <td style="max-width: 600px; font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 10px; color: #BCBCBC; line-height: 1.5;"></td>
                </tr>
                <tr>
                    <td>
                        <table style="font-family: Roboto-Regular,Helvetica,Arial,sans-serif; font-size: 10px; color: #666666; line-height: 18px; padding-bottom: 10px">
                            <tbody>
                            <tr>
                                <td>我们向您发送这封重要的电子邮件通知，目的是让您完成密码重置的这一步骤。</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td width="32px"></td>
    </tr>
    <tr height="32px"></tr>
    </tbody>
</table>